// JavaScript Document
// Ελέγχουμε με κατάλληλο regular expression αν η τιμή του mail έχει έγκυρη μορφή. 
// Για περισσότερες λεπτομέρειες, μπορεί να ανατρέξει κανείς 
//στο google με αναζήτηση 'regular expressions javascript'
// Η συνάρτηση αυτή επιστρέφει 1 αν η τιμή του x είναι κενή, 0 σε διαφορετική περίπτωση
function blank ( x )
{
	 var length = x.length; // Αποθηκεύουμε τον αριθμό των χαρακτήρων
	 var result = 1;

	for (i = 1;i <= length;i++)
	{
		if (x.charAt(i-1) != " ") { // Διατρέχουμε έναν έναν χαρακτήρα και αν υπάρχει έστω ένας που ΔΕΝ είναι ο κενός, επιστρέφουμε 0
			result = 0;
			break;
		}
	} 
	return result;
}


// onSubmit="return validate_form_pages();"
//views/pages
function validate_form_pages()
{
	//data pages
	var title = document.getElementById('title').value;
	var slug = document.getElementById('slug').value;
	var label = document.getElementById('label').value;
	var header = document.getElementById('header').value;
	var body = document.getElementById('body').value;
	var user = document.getElementById('user').value;
	//msg
	var msg = "Δεν έχετε συμπληρώσει τα παρακάτω πεδία\n\n";

	if (blank(title)) { msg = msg + "- Title:\n"; }

	if (blank(slug))  {	msg = msg + "- Slug:\n";  }

	if (blank(label)) {	msg = msg + "- Label:\n"; }

	if (blank(header)) { msg = msg + "- Header:\n"; }

	if (blank(body)) {	msg = msg + "- Body:\n";  }

	if (user == 0 ) { msg = msg + "- User is 0 .. select 1 user for this page:\n"; }

	if (msg!="Δεν έχετε συμπληρώσει τα παρακάτω πεδία\n\n") {
		alert ( msg );
		return false;
	}
	return true;
}


// onSubmit="return validate_form_news();"
//views/news
function validate_form_news()
{
	//data pages
	var title = document.getElementById('title').value;
	var user = document.getElementById('user').value;
	var body = document.getElementById('body').value;
	//msg
	var msg = "Δεν έχετε συμπληρώσει τα παρακάτω πεδία\n\n";

	if (blank(title)) { msg = msg + "- Title:\n"; }

	if (blank(body)) {  msg = msg + "- Body:\n"; }

	if (user == 0 ) { msg = msg + "- Author is 0 .. select 1 author for this new:\n"; }
	
	if (msg!="Δεν έχετε συμπληρώσει τα παρακάτω πεδία\n\n") {
		alert ( msg );
		return false;
	}
	return true;
}


// onSubmit="return validate_form_type_job();"
//views/type_job
function validate_form_type_job()
{
	//data type-job
	var name = document.getElementById('name_job').value;
	var team = document.getElementById('team').value;
	var lever = document.getElementById('lever').value;
	//msg
	var msg = "Δεν έχετε συμπληρώσει τα παρακάτω πεδία\n\n";

	if (blank(name)) { msg = msg + "- Name Job:\n"; }

	if (blank(team)) {  msg = msg + "- Team:\n"; }

	if (blank(lever)) {  msg = msg + "- Lever:\n"; }
	
	if (msg!="Δεν έχετε συμπληρώσει τα παρακάτω πεδία\n\n") {
		alert ( msg );
		return false;
	}
	return true;
}


// onSubmit="return validate_form_users();"
//views/users
function validate_form_users()
{
	//data users
	var first     = document.getElementById('first').value;
	var last      = document.getElementById('last').value;
	var email     = document.getElementById('email').value;
	var password  = document.getElementById('password').value;
	var passwordv = document.getElementById('passwordv').value;
	
	// msg
	var msg = "Δεν έχετε συμπληρώσει τα παρακάτω πεδία\n\n";

	if (blank(first)) {	msg = msg + "- First Name:\n"; }

	if (blank(last))  {	msg = msg + "- Last Name:\n";  }
	
	if (blank(email)) {	msg = msg + "- Email Adress:\n"; }
	else if (!email.match(/(\w+)@(.+)\.(\w+)$/)) { 	msg = msg + "- Το E-mail δεν είναι έγκυρο\n"; }

	if (blank(password)) {	msg = msg + "- Password:\n"; }

	if (blank(passwordv)) { msg = msg + "- Verify Password:\n"; }

	if (msg!="Δεν έχετε συμπληρώσει τα παρακάτω πεδία\n\n") {
		alert ( msg );
		return false;
	}
	return true;
}


// onSubmit="return validate_form_member();"
//views/member
function validate_form_member()
{
	//data type-job
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	var passwordv = document.getElementById('passwordv').value;
	var first = document.getElementById('first').value;
	var last = document.getElementById('last').value;
	var address = document.getElementById('address').value;
	var wphone = document.getElementById('wphone').value;
	var mphone = document.getElementById('mphone').value;

	//msg
	var msg = "Δεν έχετε συμπληρώσει τα παρακάτω πεδία\n\n";

	if (blank(email)) {	msg = msg + "- Email Adress:\n"; }
	else if (!email.match(/(\w+)@(.+)\.(\w+)$/)) { 	msg = msg + "- Το E-mail δεν είναι έγκυρο\n"; }

	if (blank(password)) {  msg = msg + "- password:\n"; }

	if (blank(passwordv)) {  msg = msg + "- passwordv:\n"; }

	if (passwordv != password) {  msg = msg + "- password is not the same passwordv:\n"; }
	
	if (msg!="Δεν έχετε συμπληρώσει τα παρακάτω πεδία\n\n") {
		alert ( msg );
		return false;
	}
	return true;
}


// onSubmit="return validate_form_contact();"
//views/contact
function validate_form_contact()
{
	//data type-job
	var type_to = document.getElementById('type_to').value;
	var member_to = document.getElementById('member_to').value;
	var admin_to = document.getElementById('admin_to').value;
	var title = document.getElementById('title').value;
	var body = document.getElementById('body').value;
	
	//msg
	var msg = "Δεν έχετε συμπληρώσει τα παρακάτω πεδία\n\n";

	if (blank(title)) {  msg = msg + "- Title:\n"; }

	if (blank(body)) {  msg = msg + "- Body:\n"; }
	if (type_to == -1 && member_to == -1 && admin_to == -1) 
		{ msg = msg + "- You have not selected sender. :\n";};

	if (msg!="Δεν έχετε συμπληρώσει τα παρακάτω πεδία\n\n") {
		alert ( msg );
		return false;
	}
	return true;
}


// onSubmit="return validate_form_login_admin();"
//login
function validate_form_login()
{
	// Παίρνουμε τις τιμές των html στοιχείων της φόρμας ανάλογα με το id τους
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	
	// Δημιουργούμε ένα μήνυμα σε περίπτωση που ο χρήστης δεν έχει συμπληρώσει κάποιο από τα πεδία της φόρμας
	var msg = "Δεν έχετε συμπληρώσει τα παρακάτω πεδία\n\n";

	if (blank(email)) { msg = msg + "- Email\n"; }
	else if (!email.match(/(\w+)@(.+)\.(\w+)$/)) { // Ελέγχουμε με κατάλληλο regular expression αν η τιμή του mail έχει έγκυρη μορφή. Για περισσότερες λεπτομέρειες, μπορεί να ανατρέξει κανείς στο google με αναζήτηση 'regular expressions javascript' 
		msg = msg + "- Το E-mail δεν είναι έγκυρο\n";
	}

	if (blank(password)) {	msg = msg + "- Password\n"; }

	if (msg!="Δεν έχετε συμπληρώσει τα παρακάτω πεδία\n\n") {
		alert ( msg );
		return false;
	}
	return true;
}