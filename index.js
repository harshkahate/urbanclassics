function formValidation() {
    var name = document.forms["contact-form"]["userName"].value;
    var phnum = document.forms["contact-form"]["userPhNum"].value;
    var submit = true; 
    /* if any of the validations fail, then submit is set to false and then form
    cannot be submitted */

    // validation 1: if the name is invalid, form does not submit 
    
    /* ensuring that the name is at least 2 characters long and at most 40 characters 
    long */
    if (name.trim().length<2 || name.trim().length>40) {
        alert("Name must be at least 2 letters long and at most 40 letters long");
        submit=false;
    }
    // ensuring that name only contains uppercase letters, lowercase letters and space
    var unicodeValue;
    for (var index=0;index<name.length;index++) {
        unicodeValue=name.charCodeAt(index);
        /* charCodeAt() method returns unicode of the character at the specified 
        index in the string */
        if(unicodeValue>=65&&unicodeValue<=90) {
            // uppercase letter - valid
            continue;
        } else if (unicodeValue>=97&&unicodeValue<=122) {
            // lowercase letter - valid 
            continue;
        } else if (unicodeValue==32) {
            // space - valid
            continue;
        } else {
            // invalid character
            alert("Name cannot contain "+name.charAt(index));
            submit=false;
            break; // breaking from the for loop
        }
    }

    // validation 2: if the phone number is invalid, form does not submit 
    
    // ensuring that phnum is of 10 digits
    if (phnum.length!=10) {
        alert("Phone number must be of 10 digits");
        submit=false;
    }
    /* ensuring that phnum doesn't contain any special character, letter, space 
    or decimal point - for this we convert phnum from string to number and then 
    check if it is an integer */
    if (!Number.isInteger(Number(phnum))) {
        alert("Phone number should have numeric values only");
        submit=false;
    } 
    /* ensuring that phnum is not a negative number - for this we convert phnum from 
    string to number and then check if it is less than 0  */
    if (Number(phnum)<0) {
        alert("Phone number cannot be negative");
        submit=false;
    } 

    return submit;
}