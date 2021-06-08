import React, { useState } from "react";
import Header from "./Header";
import { Table } from "react-bootstrap";

function SearchProduct() {
  //   const [key, setKey] = useState("sunflower");
  const [data, setData] = useState([]);

  let tempKey = "";

  async function Search(key) {
    if (key.length > 1) {
      tempKey = key;
      let result = await fetch(
        `http://localhost:8000/api/search/${key.replaceAll(" ", "")}`
      );
      result = await result.json();
      console.log(result);
      setData(result);
    }
  }

  return (
    <>
      <Header />
      <div className='col-sm-6 offset-sm-3'>
        <h1>search product</h1>
        <br />
        <input
          type='text'
          className='form-control'
          placeholder='Search Product'
          //  value={key}
          onChange={(e) => Search(e.target.value)}
        />
        <br />
        {/* <button onClick={goSearch} className='btn btn-primary'>
          Search
        </button> */}
      </div>
      <br />
      <br />
      <div>
        {data.length > 0 ? (
          <Table striped bordered hover>
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Price</th>
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
                  </tr>
                );
              })}
            </tbody>
          </Table>
        ) : (
          <h1>search result</h1>
        )}
      </div>
    </>
  );
}

export default SearchProduct;
