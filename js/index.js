function user() {
  const readData = () => {
    const route =
      "https://faas-nyc1-2ef2e6cc.doserverless.co/api/v1/web/fn-63d0eec1-53fa-417b-8052-e630ca4a896b/default/user-php";
    fetch(route)
      .then((response) => response.json())
      .then((data) => fillTable(data));
  };
  readData();

  const fillTable = (data) => {
    let tableContent = "";
    data.forEach((item) => {
      let row = `
        <tr>
          <td>${item.name}</td>
          <td>${item.lastname}</td>
          <td>${item.occupation}</td>
          <td>
            <i class="bi bi-pencil-fill btn-edit" data-bs-toggle="modal" data-bs-target="#modal-edit"></i>
          </td>
          <td>
            <i class="bi bi-x-circle btn-delete" data-bs-toggle="modal" data-bs-target="#modal-delete"></i>
          </td>
        </tr>
      `;
      tableContent += row;
    });
    document.getElementById("userData").innerHTML = tableContent;

    // EDIT USER
    const btnEditUsers = document.querySelectorAll('.btn-edit');
    btnEditUsers.forEach((btnEditUser) => {
      btnEditUser.addEventListener('click', function () {
        const actualRow = this.parentElement.parentElement;
        const position = Array.from(actualRow.parentElement.children).indexOf(actualRow);

        document.querySelector('#txtIdUserEdit').value = data[position].iduser;
        document.querySelector('#txtNameEdit').value = data[position].name;
        document.querySelector('#txtLastNameEdit').value = data[position].lastname;
        document.querySelector('#txtOccupationEdit').value = data[position].occupation;
        console.log(data[position]);

      });
    });

    //DELETE USER
    const btnDeleteUsers = document.querySelectorAll('.btn-delete');
    btnDeleteUsers.forEach((btnDeleteUser) => {
      btnDeleteUser.addEventListener('click', function () {
        const actualRow = this.parentElement.parentElement;
        const position = Array.from(actualRow.parentElement.children).indexOf(actualRow);

        document.querySelector('#txtIdUserDelete').value = data[position].iduser;
        document.querySelector('#txtNameDelete').value = data[position].name;
        document.querySelector('#txtLastNameDelete').value = data[position].lastname;
        document.querySelector('#txtOccupationDelete').value = data[position].occupation;
        console.log(data[position]);

      });
    });
  };

  //ADD USER
  document.querySelector('#addButton').addEventListener('click', () => {
    const name = document.querySelector('#txtName').value;
    const lastname = document.querySelector('#txtLastName').value;
    const occupation = document.querySelector('#txtOccupation').value;

    document.querySelector('#txtName').value = '';
    document.querySelector('#txtLastName').value = '';
    document.querySelector('#txtOccupation').value = '';

    const route = "https://faas-nyc1-2ef2e6cc.doserverless.co/api/v1/web/fn-63d0eec1-53fa-417b-8052-e630ca4a896b/default/user-add-php";
    const _data = {
      name,
      lastname,
      occupation,
    };

    fetch(route, {
      method: "POST",
      body: JSON.stringify(_data),
      headers: { "Content-type": "application/json; charset=UTF-8" },
    })
      .then((response) => response.json())
      .then((json) => {
        console.log(json);
        readData();
      });
  });


  //EDIT USER
  document.querySelector("#editButton").addEventListener("click", () => {
    const iduser = document.querySelector("#txtIdUserEdit").value
    const name = document.querySelector("#txtNameEdit").value;
    const lastname = document.querySelector("#txtLastNameEdit").value;
    const occupation = document.querySelector("#txtOccupationEdit").value;

    const route = "https://faas-nyc1-2ef2e6cc.doserverless.co/api/v1/web/fn-63d0eec1-53fa-417b-8052-e630ca4a896b/default/user-edit-php";
    const _data = {
      iduser,
      name,
      lastname,
      occupation,
    };

    fetch(route, {
      method: "POST",
      body: JSON.stringify(_data),
      headers: { "Content-type": "application/json; charset=UTF-8" },
    })
      .then((response) => response.json())
      .then((json) => {
        console.log(json);
        readData();
      });
  });

  //DELETE USER
  document.querySelector("#deleteButton").addEventListener("click", () => {
    const iduser = document.querySelector("#txtIdUserDelete").value

    const route = 'https://faas-nyc1-2ef2e6cc.doserverless.co/api/v1/web/fn-63d0eec1-53fa-417b-8052-e630ca4a896b/default/user-delete-php';
    const _data = {
      iduser
    }

    fetch(route, {
      method: "POST",
      body: JSON.stringify(_data),
      headers: { "Content-type": "application/json; charset=UTF-8" },
    })
      .then((response) => response.json())
      .then((json) => {
        console.log(json);
        readData();
      });
  });
}
user();