const express = require('express');
const router = express.Router();
const db = require('../helpers/dbServices');
const frontendData = require("../helpers/frontendData");
const nodemailer = require("nodemailer");
const { google } = require("googleapis");
const OAuth2 = google.auth.OAuth2;
router.get('/', function(req, res){
    console.log(req.session.email);
    console.log(req.session.type);
    if(req.session !== undefined && req.session.error === true){
        req.session.error = false;
        let msg = req.session.errmsg;
        req.session.errmsg = undefined;

        res.render('index', {
            headerData: frontendData.getHeaderLoginData(req.session),
            errmsg: msg
        });
    }else {
        res.render('index', {
            headerData: frontendData.getHeaderLoginData(req.session)
        });
    }
});
router.get("/login", function(req,res) {
    if(req.session.email !== undefined){
        res.redirect("/home")
    }
    else{
        if(req.session !== undefined && req.session.error === true){
            req.session.error = false;
            let msg = req.session.errmsg;
            req.session.errmsg = undefined;

            res.render('login', {errmsg: msg});
        }else {
            res.render('login');
        }
    }
});
router.get("/home", function(req, res){
    if(req.session.email !== undefined){
        try {
            db.returnStartup(req.session.email, req.session.type, (result) => {
                res.render('cards', {
                    startups: result,
                    headerData: frontendData.getHeaderLoginData(req.session),
                    buttonData: frontendData.getCardsUserType(req.session) 
                });
            });
        } catch (err) {
            console.error(err);
            res.render('cards',{errmsg:"Error in fetching startups!"});
        }
    }else{
        try {
            db.returnStartup(undefined, undefined, (result) => {
                res.render('cards', {
                    startups: result,
                });
            });
        } catch (err) {
            console.error(err);
            res.render('cards',{errmsg:"Error in fetching startups!"});
        }
    }
});
router.get("/signup/signup_investor", function(req,res){
  try{
    res.render("signup_investor");
  }
  catch(err){
    console.log(err);
    res.render('index',{errmsg:"Signup error!"});
  }
});
router.get("/signup/signup_startup", function(req,res){
  try{
    res.render("signup_startup");
  }
  catch(err){
  res.render('/',{errmsg:"Signup error!"});
  }
});
router.get("/signup/signup_intern", function(req,res){
  try{
    res.render("signup_intern");
  }
  catch(err){
  res.redirect('/',{errmsg:"Signup error!"});
  }
});
router.get("/logout", function(req, res){
    req.session.destroy();
    res.redirect('/');
});
router.post("/applyAsIntern", function(req, res){
    let startupEmail = req.body.startupEmail;
    let date = new Date();
    try{
    date.toISOString().split('T')[0];
    db.insertInternApplication(req.session.email, startupEmail, date, () => {
        res.redirect("/home");
    });
  }
  catch(err){ res.redirect('/',{errmsg:"Signup error!"});}}
);
router.post("/applyAsInvestor", function(req, res){
  try{
    let startupEmail = req.body.startupEmail;
    let date = new Date();
    date.toISOString().split('T')[0];
    db.insertInvestApplication(req.session.email, date, startupEmail, () => {
        res.redirect("/home");
    });
  }
  catch(err){
    res.redirect('/',{errmsg:"Application error!"});
  }
});
router.post("/actionIntern", function(req, res){
    if(req.session.email !== undefined && req.session.type === "startup"){
        let internEmail = req.body.internEmail;
        let status = req.body.status;
        db.updateApplicationStatus(internEmail, req.session.email, status,() =>{
            res.redirect("/account");
        });
    }
});
router.get("/account", function(req,res){
    let type=req.session.type;
    if(type==="investor"){
      try {
        db.returnInvestor(req.session.email,(result)=>{
        res.render('account_investor', {
          compEmail: req.session.email,
          compType:result[0][0].companyType,
          compName:result[0][0].companyName,
          tableRow:result[1],
          headerData: frontendData.getHeaderLoginData(req.session),
          buttonData: frontendData.getCardsUserType(req.session) 
        }) });
      } catch (err) {
        console.error(err);
        res.redirect('/',{errmsg:"Failed to fetch account!"});
      } }
    else if(type==="intern")
    {
      try {
        db.returnInternDetails(req.session.email, (result)=>{
            let tableData = [];
            for(let i of result[1]){
                if(i.status === "A"){
                    i.status = "Accepted";
                }else if (i.status === "R"){
                    i.status = "Rejected";
                }else if (i.status === "P"){
                    i.status = "Pending";
                }
                tableData.push(i);
            }
        res.render('account_intern', {
          internEmail: result[0][0].internEmail,
          internName:result[0][0].internName,
          college:result[0][0].college, 
          department:result[0][0].department, 
          qualifications:result[0][0].qualification,
          collegeDegree:result[0][0].collegeDegree,
          internDOB:result[0][0].internDOB,
          graduationYear:result[0][0].graduationYear,
          tableApplies:tableData,
          headerData: frontendData.getHeaderLoginData(req.session),
          buttonData: frontendData.getCardsUserType(req.session) 
        })
      });
      } catch (err) {
        console.error(err);
        res.redirect('/',{errmsg:"Failed to fetch account!"});
      }
    }
    else if (type==="startup"){
      try {
        db.returnStartupDetails(req.session.email,(result)=>{
        res.render('account_startup', {
          startupEmail: result[0][0].startupEmail,
          startName:result[0][0].startupName,
          startCIN:result[0][0].startupCIN, 
          startStage:result[0][0].startupStage, 
          startNature:result[0][0].startupNature, 
          startWebsiteLink:result[0][0].startupWebsiteLink, 
          startDetails:result[0][0].startupDetails,
          startlogo:result[0][0].startupLogo,
          tableIntern:result[1],
          tableInvestor:result[2],
          headerData: frontendData.getHeaderLoginData(req.session),
          buttonData: frontendData.getCardsUserType(req.session) 
        })
      });
      } catch (err) {
        console.error(err);
        res.redirect('/',{errmsg:"Failed to fetch account!"});
      }
    }
    });
const oauth2Client = new OAuth2(
  "967947795425-p3uhq5b3ftqifskh432jk3gsqb36rfqd.apps.googleusercontent.com", // ClientID
  "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", // Client Secret
  "https://developers.google.com/oauthplayground" // Redirect URL
);


oauth2Client.setCredentials({
  refresh_token: "1//04ce7uCwB57DxCgYIARAAGAQSNwF-L9IrbVkof_g3yeQcctLr0AKhhJD8iBV2wWtzHoZeXHopZotp394KMml7A6SA5CPIcqYJG1k"
});
const accessToken = oauth2Client.getAccessToken();
router.post('/submit-data', function (req, res) {
  const output=`
  <p>You have a new contact request</p>
  <h3>Contact details</h3>
  <ul>
    <li>Name: ${req.body.name}</li>
    <li>Email: ${req.body.email}</li>
  </ul>
    <h3>Message: <p>${req.body.message}</p></h3>
  `
  const smtpTransport = nodemailer.createTransport({
    service: "gmail",
    auth: {
         type: "OAuth2",
         user: "seyedismail.mohamed2019@vitstudent.ac.in", 
         clientId: "967947795425-p3uhq5b3ftqifskh432jk3gsqb36rfqd.apps.googleusercontent.com",
         clientSecret: "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",
         refreshToken: "1//04ce7uCwB57DxCgYIARAAGAQSNwF-L9IrbVkof_g3yeQcctLr0AKhhJD8iBV2wWtzHoZeXHopZotp394KMml7A6SA5CPIcqYJG1k",
         accessToken: accessToken
    },
    tls:{
      rejectUnauthorized:false
    }
});
  var mailOptions = {
    from: 'seyedismail.mohamed2019@vitstudent.ac.in',
    to: 'aaronniju.john2019@vitstudent.ac.in',
    subject: 'New query from StartUp Org',
    html: output
  };
  smtpTransport.sendMail(mailOptions, function(error, info){
    if (error) {
      console.log(error);
      const errmsg="Failed to Deliver:((. Please retry or contact us from below Hoping to hear from you soon!"
      res.render('index',
      {msg:errmsg,
      headerData: frontendData.getHeaderLoginData(req.session),
      buttonData: frontendData.getCardsUserType(req.session) });
    } else {
      console.log('Email sent: ' + info.response);
    }
  });
  const sentmsg="Submitted Request.Will get to u shortly!!!";
  res.render('index',
  {
   msg:sentmsg,
   headerData: frontendData.getHeaderLoginData(req.session),
   buttonData: frontendData.getCardsUserType(req.session)
  });
  smtpTransport.close();
});
module.exports = router;

