import React, { useEffect, useState } from "react";
import Header from "./Header";
import { withRouter } from "react-router-dom";

function UpdateProduct(props) {
  const [name, setName] = useState("");
  const [price, setPrice] = useState("");
  const [description, setDescription] = useState("");
  const [file, setFile] = useState("");

  const id = props.match.params.id;
  const [data, setData] = useState([]);

  useEffect(async function getItem() {
    let result = await fetch(`http://127.0.0.1:8000/api/product/${id}`);
    result = await result.json();
    setData(result);
    setName(data.name);
    setPrice(data.price);
    setDescription(data.description);
    setFile(data.file_path);
  }, []);
  async function editProduct(id) {
    const formData = new FormData();
    formData.append("file", file);
    formData.append("price", price);
    formData.append("description", description);
    formData.append("name", name);

    let result = fetch(`http://127.0.0.1:8000/api/product/${id}?_method=PUT`, {
      method: "POST",
      body: formData,
    });
  }

  return (
    <div>
      <Header />
      <h1>upadate</h1>
      <input
        type='text'
        onChange={(e) => setName(e.target.value)}
        defaultValue={data && data.name}
      />
      <br />
      <input
        type='text'
        onChange={(e) => setPrice(e.target.value)}
        defaultValue={data && data.price}
      />
      <br />
      <input
        type='text'
        onChange={(e) => setDescription(e.target.value)}
        defaultValue={data && data.description}
      />
      <br />
      <input
        type='file'
        onChange={(e) => setFile(e.target.files[0])}
        defaultValue={data && data.file_path}
      />
      <br />
      {data && (
        <img
          width='100px'
          src={`http://127.0.0.1:8000/${data.file_path}`}
          alt=''
        />
      )}
      <button onClick={() => editProduct(id)}>update</button>
    </div>
  );
}

export default withRouter(UpdateProduct);
