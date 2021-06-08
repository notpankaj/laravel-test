import React, { useState, useEffect } from "react";
import Header from "./Header";
import { useHistory } from "react-router-dom";

function Login() {
  const history = useHistory();

  useEffect(() => {
    if (localStorage.getItem("user-info")) {
      history.push("/add");
    }
  }, []);

  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");

  async function login() {
    const loginObj = { email, password };
    console.log(loginObj);
    let result = await fetch("http://127.0.0.1:8000/api/login", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
      },
      body: JSON.stringify(loginObj),
    });
    result = await result.json();
    console.log(result);

    if (!result.error) {
      localStorage.setItem("user-info", JSON.stringify(result));
      history.push("/add");
    }
  }

  return (
    <>
      <Header />
      <div className='col-sm-6 offset-sm-3'>
        <h1>login page</h1>
        <br />
        <input
          type='text'
          className='form-control'
          value={email}
          onChange={(e) => {
            setEmail(e.target.value);
          }}
          placeholder='email'
        />
        <br />
        <input
          type='text'
          className='form-control'
          value={password}
          onChange={(e) => {
            setPassword(e.target.value);
          }}
          placeholder='password'
        />
        <br />
        <button className='btn btn-primary' onClick={login}>
          Login
        </button>
      </div>
    </>
  );
}

export default Login;
