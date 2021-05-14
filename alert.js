//Create variable c and initialize it
var c = 1;
//Create function pop()
function pop()
{
			//create function okay for main form
			this.ok = function()
			{
				document.getElementById('PopUp').style.display = "None";
				document.getElementById('PopOverlay').style.display = "None";
				window.location = "mainForm.php";
			}
			//create function orderok for order book form
			this.orderok = function()
			{
				document.getElementById('PopUp').style.display = "None";
				document.getElementById('PopOverlay').style.display = "None";
				window.location = "MorderBook.php";
			}
			//create function profileok for profile change form 
			this.profileok = function()
			{
				document.getElementById('PopUp').style.display = "None";
				document.getElementById('PopOverlay').style.display = "None";
				window.location = "MprofileChange.php";
			}
			//create function oklogin for login form
			this.oklogin = function()
			{
				document.getElementById('PopUp').style.display = "None";
				document.getElementById('PopOverlay').style.display = "None";
				window.location = "mainForm.php";
			}
			//create function okaddbook for addbook form
			this.okaddbook = function()
			{
				document.getElementById('PopUp').style.display = "None";
				document.getElementById('PopOverlay').style.display = "None";
				window.location = "AddBooks.php";
			}
			//create function okdeletebook for delete book form
			this.okdeletebook = function()
			{
				document.getElementById('PopUp').style.display = "None";
				document.getElementById('PopOverlay').style.display = "None";
				window.location = "UpdateDelete.php";
			}
			//create function okdeletemem for delete memeber form
			this.okdeletemem = function()
			{
				document.getElementById('PopUp').style.display = "None";
				document.getElementById('PopOverlay').style.display = "None";
				window.location = "Member.php";
			}
			//create function okissuebook for issue book form
			this.okissuebook = function()
			{
				document.getElementById('PopUp').style.display = "None";
				document.getElementById('PopOverlay').style.display = "None";
				window.location = "IssueBook.php";
			}
			//create function okretuenbook for return book form
			this.okretuenbook = function()
			{
				document.getElementById('PopUp').style.display = "None";
				document.getElementById('PopOverlay').style.display = "None";
				window.location = "returnBook.php";
			}
			//create function oksettings for settings book form
			this.oksettings = function()
			{
				document.getElementById('PopUp').style.display = "None";
				document.getElementById('PopOverlay').style.display = "None";
				window.location = "settings.php";
			}
			//create function okmeesage for message form
			this.okmeesage = function()
			{
				document.getElementById('PopUp').style.display = "None";
				document.getElementById('PopOverlay').style.display = "None";
				window.location = "Message.php";
			}
			//create function okcancelorder for issue form
			this.okcancelorder = function()
			{
				document.getElementById('PopUp').style.display = "None";
				document.getElementById('PopOverlay').style.display = "None";
				window.location = "IssueBook.php";
			}
			//create function pwd alert					
			this.pwd = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey User!";
				document.getElementById('content').innerHTML = "Passwords Don't Match..";
			}
			//create function register alert
			this.register = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey User!";
				document.getElementById('content').innerHTML = "Thank You For Connected With Us!";
			}
			//create function error alert
			this.error = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey User!";
				document.getElementById('content').innerHTML = "Something Is Going Wrong Or You Are Already Regitsred!";
			}
			//create function server error alert
			this.errserver = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Alert From Server Side!";
				document.getElementById('content').innerHTML = "Unable To Connect With Server!";
			}
			this.orderdone = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey User!";
				document.getElementById('content').innerHTML = "You Are Successfully Ordered The Book!";
			}
			this.ordercancel = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey User!";
				document.getElementById('content').innerHTML = "You'r Order Is Not Accepted!";
			}
			this.profilechange = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey User!";
				document.getElementById('content').innerHTML = "You'r profile is changed!";
			}
			this.fillform = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey User!";
				document.getElementById('content').innerHTML = "Please Fill The Form!";
			}
			this.errsql = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Alert From Server Side!";
				document.getElementById('content').innerHTML = "Problem With Server Side!";
			}
			this.erruser = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey User!";
				document.getElementById('content').innerHTML = "Please Insert The Username!";
			}
			this.erruser = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey User!";
				document.getElementById('content').innerHTML = "Please Insert The Password!";
			}
			this.Afillform = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey Admin!";
				document.getElementById('content').innerHTML = "Please Fill The Form!";
			}
			this.addbook = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey Admin!";
				document.getElementById('content').innerHTML = "Successfully Added The Book!";
			}
			this.deletebook = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey Admin!";
				document.getElementById('content').innerHTML = "Successfully Deleted The Book!";
			}
			this.updatebook = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey Admin!";
				document.getElementById('content').innerHTML = "Successfully Updated The Book Details!";
			}
			this.deletemem = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey Admin!";
				document.getElementById('content').innerHTML = "Successfully Deleted The Member!";
			}
			this.updatemem = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey Admin!";
				document.getElementById('content').innerHTML = "Successfully Updated The Member Details!";
			}
			this.issuebook = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey Admin!";
				document.getElementById('content').innerHTML = "Successfully Issue The Book!";
			}
			this.returnbook = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey Admin!";
				document.getElementById('content').innerHTML = "Successfully Returned The Book!";
			}
			this.updatereturnbook = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey Admin!";
				document.getElementById('content').innerHTML = "Successfully Updated Returned Book Details!";
			}
			this.changefine = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey Admin!";
				document.getElementById('content').innerHTML = "Successfully Changed Fine!";
			}
			this.insertcategory = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey Admin!";
				document.getElementById('content').innerHTML = "Successfully Inserted Category!";
			}
			//create function delete category alert
			this.deletecategory = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey Admin!";
				document.getElementById('content').innerHTML = "Successfully Deleted Category!";
			}
			//create function send message alert
			this.sendmsg = function()
			{
				var winH = window.innerHeight;
				var winW = window.innerwidth;
				document.getElementById('PopOverlay').style.display = "Block";
				document.getElementById('PopUp').style.display = "Block";
				document.getElementById('PopOverlay').style.height = winH + "px";
				document.getElementById('topic').innerHTML = "Hey Admin!";
				document.getElementById('content').innerHTML = "Successfully Sent Message!";
			}
}
var Alert = new pop();