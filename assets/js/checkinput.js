function checkInput() {
    const userInput = document.getElementsByName("searchInput")[0].value;
    const submitButton = document.getElementsByName("Input")[0];
  
    if (userInput.trim() !== "") {
      submitButton.removeAttribute("disabled");
    } else {
      submitButton.setAttribute("disabled", "true");
    }
  }