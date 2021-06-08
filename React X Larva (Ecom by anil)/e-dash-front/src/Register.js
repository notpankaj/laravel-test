import React, { useState, useEffect } from "react";
import Header from "./Header";
import { useHistory } from "react-router-dom";

function Register() {
  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");

  useEffect(() => {
    if (localStorage.getItem("user-info")) {
      history.push("/add");
    }
  }, []);

  const history = useHistory();

  async function signUp() {
    const userObj = {
      name,
      email,
      password,
    };

    let result = await fetch("http://127.0.0.1:8000/api/register", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
      },
      body: JSON.stringify(userObj),
    });

    result = await result.json();
    console.log("result", result);

    localStorage.setItem("user-info", JSON.stringify(result));
    history.push("/add");
  }

  return (
    <>
      <Header />
      <div className='col-sm-6 offset-sm-3'>
        <h1>User Sign Up Page</h1>
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
          type='tezt'
          value={email}
          onChange={(e) => setEmail(e.target.value)}
          className='form-control'
          placeholder='email'
        />
        <br />
        <input
          type='password'
          value={password}
          onChange={(e) => setPassword(e.target.value)}
          className='form-control'
          placeholder='password'
        />
        <br />
        <button onClick={signUp} className='btn btn-primary'>
          Sign Up
        </button>
      </div>
    </>
  );
}

export default Register;
