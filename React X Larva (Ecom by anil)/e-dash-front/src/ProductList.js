import React, { useEffect, useState } from "react";
import Header from "./Header";
import { Table } from "react-bootstrap";
import { Link } from "react-router-dom";
// import Delete from "./comp/Delete";

function ProductList() {
  const [data, setData] = useState([]);

  async function getList() {
    let result = await fetch("http://127.0.0.1:8000/api/list");
    result = await result.json();
    setData(result);
  }
  useEffect(() => {
    getList();
  }, []);

  async function deleteItem(id) {
    let result = await fetch(`http://127.0.0.1:8000/api/product/${id}`, {
      method: "DELETE",
    });
    result = await result.json();
    // console.log(result);
    getList();
  }

  // console.log(data);
  return (
    <div>
      <Header></Header>
      <div>
        <Table striped bordered hover>
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Image</th>
              <th>Description</th>
              <th>Price</th>
              <th>Operation</th>
            </tr>
          </thead>
          <tbody>
            {data.map((item) => {
              return (
                <tr key={item.id}>
                  <td>{item.id}</td>
                  <td>{item.name}</td>
                  <td>
                    <img
                      width='100px'
                      height='120px'
                      src={"http://localhost:8000/" + item.file_path}
                    />
                  </td>
                  <td>{item.description}</td>
                  <td>{item.price}</td>
                  <td>
                    <button
                      onClick={() => {
                        deleteItem(item.id);
                      }}
                    >
                      Delete
                    </button>
                  </td>
                  <td>
                    <Link to={"/update/" + item.id}>
                      <span>Edit</span>
                    </Link>
                  </td>
                </tr>
              );
            })}
          </tbody>
        </Table>
      </div>
    </div>
  );
}

export default ProductList;
