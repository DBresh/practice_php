window.onload = function () {
  AsyncGetContent();
};

function CreateNote(table) {
  var trItem = document.createElement("tr");

  var tdid = document.createElement("td");
  var inputid = document.createElement("input");
  inputid.id = "id_create";
  inputid.readOnly = true;
  tdid.appendChild(inputid);
  trItem.appendChild(tdid);

  var tdtitle = document.createElement("td");
  var inputtitle = document.createElement("input");
  inputtitle.id = "title_create";
  tdtitle.appendChild(inputtitle);
  trItem.appendChild(tdtitle);

  var tdtext = document.createElement("td");
  var textareaText = document.createElement("textarea");
  textareaText.id = "text_create";
  tdtext.appendChild(textareaText);
  trItem.appendChild(tdtext);

  var tdButton = document.createElement("td");
  var btnCreate = document.createElement("button");
  btnCreate.id = "create";
  btnCreate.innerHTML = "create";
  btnCreate.onclick = function () {
    var title = document.getElementById("title_create").value;
    var text = document.getElementById("text_create").value;

    fetch("async.php", {
      method: "POST",
      body: JSON.stringify({
        action: "create",
        title: title,
        text: text,
      }),
    })
      .then((response) => {
        return response.text();
      })
      .then(() => {
        AsyncGetContent();
      })
      .catch((error) => {
        console.error("Помилка запиту:", error);
      });
  };
  tdButton.appendChild(btnCreate);
  trItem.appendChild(tdButton);

  table.appendChild(trItem);
}

function AsyncGetContent() {
  var t = document.getElementById("bdtable");
  if (t != null) {
    t.remove();
  }

  fetch("async.php", {
    method: "POST",
    body: JSON.stringify({
      action: "getContent",
    }),
  })
    .then((response) => {
      return response.json();
    })
    .then((jsonData) => {
      if (jsonData.length > 0) {
        var parent = document.getElementById("container");

        var table = document.createElement("table");
        table.id = "bdtable";

        var trHeaders = document.createElement("tr");
        Object.keys(jsonData[0]).forEach((key) => {
          var thHeader = document.createElement("th");
          thHeader.innerHTML = key;
          trHeaders.appendChild(thHeader);
        });

        var thEdit = document.createElement("th");
        var thDelete = document.createElement("th");

        thEdit.innerHTML = "edit";
        thDelete.innerHTML = "delete";

        trHeaders.appendChild(thDelete);
        trHeaders.appendChild(thEdit);

        table.appendChild(trHeaders);

        jsonData.forEach((object) => {
          var id = object["id"];
          var trItem = document.createElement("tr");
          for (const key in object) {
            if (Object.hasOwnProperty.call(object, key)) {
              const value = object[key];

              var tdItem = document.createElement("td");
              if (key === "text") {
                var textItem = document.createElement("textarea");
                textItem.id = key + "_" + id;
                textItem.innerHTML = value;
                tdItem.appendChild(textItem);
              } else {
                var inputItem = document.createElement("input");

                inputItem.id = key + "_" + id;
                inputItem.type = "text";
                inputItem.value = value;

                if (key === "id") {
                  inputItem.readOnly = true;
                }

                tdItem.appendChild(inputItem);
              }
              trItem.appendChild(tdItem);
            }
          }

          var tdEdit = document.createElement("td");
          var tdDelete = document.createElement("td");

          var btnDelete = document.createElement("button");
          var btnEdit = document.createElement("button");

          btnDelete.innerHTML = "delete";
          btnEdit.innerHTML = "edit";
          btnDelete.id = "delete_" + id;

          btnEdit.id = "edit_" + id;

          btnEdit.onclick = function () {
            var id = this.id.match(/\d+/g)[0];

            var title = document.getElementById("title_" + id);
            var text = document.getElementById("text_" + id);

            if (title && text) {
              AsyncEdit(id, title.value, text.value);
            } else {
              console.error("Елемент не знайдено для редагування.");
            }
          };

          btnDelete.onclick = function () {
            var id = this.id.match(/\d+/g)[0];
            AsyncDelete(id);
          };

          tdDelete.appendChild(btnDelete);
          tdEdit.appendChild(btnEdit);

          trItem.appendChild(tdEdit);
          trItem.appendChild(tdDelete);
          table.appendChild(trItem);
        });

        parent.appendChild(table);
      }
      CreateNote(table);
      document.getElementById("container").appendChild(table);
    })
    .catch((error) => {
      console.error("Помилка запиту:", error);
    });
}

function AsyncDelete(id) {
  fetch("async.php", {
    method: "POST",
    body: JSON.stringify({
      action: "delete",
      id: id,
    }),
  })
    .then((response) => {
      return response.text();
    })
    .then(() => {
      AsyncGetContent();
    })

    .catch((error) => {
      console.error("Помилка запиту:", error);
    });
}

function AsyncEdit(id, login, password, email) {
  fetch("async.php", {
    method: "POST",
    body: JSON.stringify({
      action: "edit",
      id: id,
      login: login,
      password: password,
      email: email,
    }),
  })
    .then((response) => {
      return response.text();
    })
    .then(() => {
      AsyncGetContent();
    })
    .catch((error) => {
      console.error("Помилка запиту:", error);
    });
}
