import React from "react";
import { Navbar, Nav, NavDropdown } from "react-bootstrap";
import { Link, useHistory } from "react-router-dom";
function Header() {
  const user = JSON.parse(localStorage.getItem("user-info"));
  const history = useHistory();

  function Logout() {
    localStorage.clear();
    history.push("/login");
  }

  return (
    <div>
      <Navbar bg='dark' variant='dark'>
        <Navbar.Brand href='/'>Navbar</Navbar.Brand>
        <Nav className='mr-auto nav_bar_wrapper'>
          {localStorage.getItem("user-info") ? (
            <>
              <Link to='/add'>Add Product</Link>
              {/* <Link to='/update'>Update Product</Link> */}
              <Link to='/search'>search Product</Link>
            </>
          ) : (
            <>
              <Link to='/login'>Login</Link>
              <Link to='/register'>Register</Link>
            </>
          )}
        </Nav>

        <Nav>
          {localStorage.getItem("user-info") && (
            <NavDropdown title={user && user.name}>
              <NavDropdown.Item onClick={Logout}>Logout</NavDropdown.Item>
              <NavDropdown.Item>Profile</NavDropdown.Item>
            </NavDropdown>
          )}
        </Nav>
      </Navbar>
    </div>
  );
}

export default Header;
