import './navBar.css';
import React from 'react';
import { Link } from 'react-router-dom'
import Logo from './hsbcadlogo.png'
import User from './user.png'

function NavBar() {

    return (
      <nav className="navBar-container">
        <div className="content-div1 ">
        <Link to="/activities">
          <img  className="icon-init" src={ Logo } alt="init"/> {/*Arreglo del logo*/}
        </Link>
          <div className="dropdown">
              <button className="menu" ><img  src="https://cdn-icons-png.flaticon.com/128/1828/1828726.png" alt="menu"/></button>
                  <div className="dropdown-content">
                    
                      <Link to="/activities/HumanResources" >Human Resources</Link>
                      <Link to="/activities/Expenses" >Expenses</Link>
                      <Link to="/activities/FixedAssets" >Fixed Assets</Link> {/*M.O: a -> Link*/}

                  </div>
          </div>
        </div>

        <div className="content-div2 ">
          <button ><img src={ User } alt="user"/></button>
          <button className="user-out" translate="yes" onClick={()=>{sessionStorage.removeItem("tokenHsb");window.location.href="/"}} >exit</button>
        </div>
      </nav>
    );
  }

  
export default NavBar;
  