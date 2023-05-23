
// // validation form
// let form = $(".js--validate-form");
// let validForm = form.jbvalidator({});
// validForm.validator.custom = function (el, event) {
//   let _val = $(el).val();
//   if ($(el).is("[name=psw]")) {
//     let ruleLength = _val.length >= 6;
//     let ruleUppercase = _val.match(new RegExp("[A-Z]"));
//     let ruleLowercase = _val.match(new RegExp("[a-z]"));
//     let ruleDigit = _val.match(new RegExp("[0-9]"));
//     let ruleSpecial = _val.match(new RegExp("[@_.!#$%^&*()]"));
//     let warningText = '<div class="warning-texts normal">';
//     let lengthClasses = "normal";

//     warningText +=
//       '<small class="' +
//       (!ruleLength ? "error" : "success") +
//       '">6 Zeichen</small>';
//     warningText +=
//       '<small class="' +
//       (!ruleUppercase ? "error" : "success") +
//       '">1 Großbuchstaben</small>';

//     if (!ruleLowercase) {
//       lengthClasses = "error";
//       warningText +=
//         '<small class="' + lengthClasses + '">1 Kleinbuchstaben</small>';
//     } else {
//       lengthClasses = "success";
//       warningText +=
//         '<small class="' + lengthClasses + '">1 Kleinbuchstaben</small>';
//     }
//     if (!ruleDigit) {
//       lengthClasses = "error";
//       warningText += '<small class="' + lengthClasses + '">1 Zahl</small>';
//     } else {
//       lengthClasses = "success";
//       warningText += '<small class="' + lengthClasses + '">1 Zahl</small>';
//     }
//     if (!ruleSpecial) {
//       lengthClasses = "error";
//       warningText +=
//         '<small class="' + lengthClasses + '">Sonderzeichen</small>';
//     } else {
//       lengthClasses = "success";
//       warningText +=
//         '<small class="' + lengthClasses + '">Sonderzeichen</small>';
//     }
//     if (
//       ruleLength &&
//       ruleLowercase &&
//       ruleUppercase &&
//       ruleDigit &&
//       ruleSpecial
//     ) {
//       // warningText = "";
//       warningText =
//         '<i class="fa-solid fa-check success-icon"></i><small></small>';
//     }

//     warningText += "</div>";
//     return warningText;
//   } else if (
//     $(el).is("[name=email]")
//   ) {
//     let warningText = '<div class="warning-texts normal">';
//     if ($(el).is(":valid")) {
//       warningText =
//         '<i class="fa-solid fa-check success-icon"></i><small></small>';
//     }
//     warningText += "</div>";
//     return warningText;
//   }

//   else if ($(el).is("[name=payment-type]")) {
//     var test = _val;
//     if (_val == "payment-paypal") {
//       $(".sepa").css("display", "none");
//       $(".desc").css("display", "block");
//     } else {
//       $(".sepa").css("display", "block");
//       $(".desc").css("display", "none");
//     }
//   }
// };

// 
function ShowHidePassword() {
    const x = document.getElementById("psw");
    const y = document.getElementById("eye");
    if (x.type === "password") {
      x.type = "text";
      y.classList.add("fa-eye");
      y.classList.remove("fa-eye-slash");
    } else {
      x.type = "password";
      y.classList.add("fa-eye-slash");
      y.classList.remove("fa-eye");
    }
  }