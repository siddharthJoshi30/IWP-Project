const {Sequelize}=require('sequelize')
const database=require('../secrets')

const sequelize=new Sequelize(database.DATABASE_NAME,database.DATABASE_USERNAME,database.DATABASE_PASSWORD,{
    host:database.DATABASE_HOST,
    dialect:database.DATABASE_DIALECT,
    sync:{
        force:true
    }
})

// const models={
//     user:sequelize.import("../models/user"),
//     emergency_contact:sequelize.import("../models/emergency_contact")
// }

try{
    sequelize.authenticate().then(()=>{
        console.log("Authentication Successfully")

    })
    sequelize.sync({
        force:true,
        logging:true

    }).then(()=>{
        console.log("Synchronized Successfully")
    })
}catch(e){
    console.log(e)
}

