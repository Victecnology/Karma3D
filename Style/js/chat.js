const chatContainer = document.querySelector("#chat-container");
const output = document.querySelector("#output");
const input = document.querySelector("#input");

input.addEventListener("keydown", function(event) {
  if (event.code === "Enter" && input.value != "") {
    var div = document.createElement("div");
    div.className = "user";
    div.innerHTML = input.value;
    output.appendChild(div);

    fetch("/api/chatbot?message=" + input.value).then(function(response) {
      return response.json();
    }).then(function(data) {
      var div2 = document.createElement("div");
      div2.innerHTML = data.message;
      output.appendChild(div2);
      chatContainer.scrollTop = chatContainer.scrollHeight;
    });

    input.value = "";
  }
});
