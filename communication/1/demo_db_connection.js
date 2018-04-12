var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "mcoban_test",
  password: "=QJFv52W?=p$"
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
});
