import React, { useState } from "react";
import Header from "./Header";

function Addproduct() {
  const [name, setName] = useState("");
  const [price, setPrice] = useState("");
  const [description, setDescription] = useState("");
  const [file, setFile] = useState("");

  async function AddProductToDb() {
    const data = { name, price, description, file };

    const formdata = new FormData();
    formdata.append("file", file);
    formdata.append("name", name);
    formdata.append("price", price);
    formdata.append("description", description);

    console.log(formdata);

    let result = await fetch("http://127.0.0.1:8000/api/addproduct", {
      method: "POST",
      body: formdata,
    });

    alert("data has been save");
  }

  return (
    <div>
      <Header />
      <div className='col-sm-6 offset-sm-3'>
        <br />
        <input
          type='text'
          value={name}
          onChange={(e) => setName(e.target.value)}
          className='form-control'
          placeholder='name'
        />
        <br />
        <input
          type='file'
          onChange={(e) => setFile(e.target.files[0])}
          className='form-control'
          placeholder='file'
        />
        <br />
        <input
          type='text'
          value={price}
          onChange={(e) => setPrice(e.target.value)}
          className='form-control'
          placeholder='price'
        />
        <br />
        <input
          type='text'
          value={description}
          onChange={(e) => setDescription(e.target.value)}
          className='form-control'
          placeholder='description'
        />
        <br />
        <button onClick={AddProductToDb} className='btn btn-primary'>
          Add Product
        </button>
      </div>
    </div>
  );
}

export default Addproduct;
