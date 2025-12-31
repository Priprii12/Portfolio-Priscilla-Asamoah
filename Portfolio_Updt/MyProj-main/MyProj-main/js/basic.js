function validateForm(form) {
  let phonePattern = /^\d{11}$/;
  if (!phonePattern.test(form.phone.value)) {
    alert("Phone number must be 11 digits long and contain only numbers.");
    return false;
  }
  
  if (form.contact_preference.value === "blank") {
    alert("Please select a contact preference.");
    return false;
  }

  let currentDate = new Date();
  let projectDate = new Date(form.project_date.value);

  if (projectDate <= currentDate) {
    alert("Project date must be at least 1 day in the future");
    return false;
  }

  let projectDuration = parseInt(form.project_duration.value);

  if (projectDuration < 1 || projectDuration >= 200) {
    alert("Project duration must be at least 1 day and less than 200 days");
    return false;
  }

  if (form.email.value !== form.confirm_email.value) {
    alert("Emails do not match");
    return false;
  }

  return true;
}

function checkEmails(form) {
  if (form.email.value !== form.confirm_email.value) {
    alert("Emails do not match. Please check again.");
  }
}

function checkDate(form) {
  let currentDate = new Date();
  let projectDate = new Date(form.project_date.value);

  if (projectDate <= currentDate) {
    alert("Project date must be at least 1 day in the future");
  }
}

window.onload = function() {
  let form = document.getElementById("enquiry-form");

  form.addEventListener("submit", function(e) {
    e.preventDefault();
    
    if (validateForm(form)) {
      // Include any additional logic here
      if (confirm("Are you sure you want to submit this data?")) {
        alert("Form Data Summary: (Not sending email)\n\n" +
          `First Name: ${form.first_name.value}\n` +
          `Description: ${form.description.value}\n` +
          `Email: ${form.email.value}\n` +
          `Phone: ${form.phone.value}\n` +
          `Contact Preference: ${form.contact_preference.value}\n` +
          `Project Date: ${form.project_date.value}\n\n` +
          `Email address: 230168011@aston.ac.uk\n\n` +
          "Please confirm your details.");

        form.reset();
      } else {
        // Do nothing or provide options to go back and continue editing
      }
    }
  });
};