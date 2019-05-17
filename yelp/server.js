const express = require('express');
const morgan = require('morgan');
const bodyParser = require('body-parser');
const mysql = require('mysql');

const app = express();
const port = process.env.PORT || 8000;

app.use(bodyParser.json());


const con = mysql.createConnection({
  host: 'classmysql.engr.oregonstate.edu',
  user: 'cs340_anandn',
  password: '4016',
  database: 'cs340_anandn'
});

con.connect((err) => {
  if(err){
    console.error('Error was: ', err);
    return;
  } else{
    console.log("Connection Established");
  }
});

// con.end((err) => {
//   // The connection is terminated gracefully
//   // Ensures all previously enqueued queries are still
//   // before sending a COM_QUIT packet to the MySQL server.
// });


//BELOW IS WHAT SHOULD BE MOVED TO ANOTHER FILE//////////////

document.getElementById("find_review").onclick = function(){
  //Extract user inputs:
  var username = document.getElementById("username").value;
  var restaurant = document.getElementById("restaurant").value;
  var keyword = document.getElementById("keyword").value;

  //Query the database:
  con.query('SELECT content, rating, price FROM review INNER JOIN user ON review.user_id = user.id INNER JOIN restaurant ON review.restaurant_id = restaurant.id WHERE user.id ='+ username + 'OR restaurant.id ='+ restaurant +'OR  review.content  LIKE \'%' + keyword + '%\'',

   function(err, data){
    if(err){//on user data fetch error
      console.error("Fatal: error fetching user data");
    }
    else{
      //Display the info (DOM Manipulation)
      //for each record in the data array: extract its contents, and DOM Append them
      var para, c_node, r_node, p_node; //nodes: content, rating, price
      //keep a variable to hold the span that all of the records will be appended to:
      var result_span = document.getElementById("find_review_result");
      for(var i = 0; i<data.length; ++i){
        //bind the primary paragraph element for each field for this record to attach to:
        para = document.createElement("p"); 
        //create dom element for this records content
        c_node = document.createTextNode(data[i].content);
        para.appendChild(c_node);
        //create dom element for this records rating
        r_node = document.createTextNode(data[i].rating);
        para.appendChild(r_node);
        //create dom element for this records price
        p_node = document.createTextNode(data[i].price);
        para.appendChild(p_node);
        //now that para is decked out with this records data, append it
        result_span.appendChild(para);
      }
    }

  });
};