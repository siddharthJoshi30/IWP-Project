const express=require('express')
const app=express()
const port=3000
app.use(express.json())
app.get("/server1_get",async(req,res)=>{
    return res.send("Hello world from iwp")
})
app.post("/server1_post",async(req,res)=>{
    return res.send(req.body)
})
app.listen(port,()=>{
    console.log("Server started")
})
