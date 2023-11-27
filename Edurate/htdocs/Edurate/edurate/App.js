import React, { useState } from 'react';
import { FaUser, FaLock, FaInstagram, FaFacebook, FaTwitter, FaYoutube } from 'react-icons/fa';
import './App.css';

const LoginForm = ({ handleLogin }) => {
  const [userid, setuserid] = useState('');
  const [password, setPassword] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();
    handleLogin(userid, password);
  };

  return (
    <div className="form-group">
      <h5 style={{ marginBottom: '10px' }}>University of the Assumption</h5>
      <h2 style={{ marginBottom: '20px' }}>Sign in to EduRate</h2>
      <label htmlFor="userInput"></label>
      <div className="icon-input-container">
        <FaUser className="user-icon" />
        <input
          type="text"
          value={userid}
          onChange={(e) => setuserid(e.target.value)}
          placeholder="User ID"
          id="userInput"
          className="user-input"
        />
      </div>

      <label htmlFor="passwordInput"></label>
      <div className="icon-input-container">
        <FaLock className="lock-icon" />
        <input
          type="password"
          value={password}
          onChange={(e) => setPassword(e.target.value)}
          placeholder="Password"
          id="passwordInput"
          className="password-input"
        />
        <h6 style={{ marginTop: '10px', marginBottom: '20px' }}>Forgot Password?</h6>

        <button type="button" onClick={handleSubmit}>
          LOGIN
        </button>
      </div>
    </div>
  );
};

const App = () => {
  const [isAuthenticated, setIsAuthenticated] = useState(false);

  const handleLogin = (userid, password) => {
    if (userid !== '' && password !== '') {
      setIsAuthenticated(true);
    }
  };

  const containerStyle = {
    fontFamily: 'Arial, sans-serif',
    margin: 0,
    height: '100vh',
    display: 'flex',
    flexDirection: 'column',
    alignItems: 'center',
    justifyContent: 'center',
    backgroundImage: `url("C:/Users/Lenovo/Downloads/EduRate Files-20231124T130103Z-001/EduRate Files/mobile-background.png")`,
    backgroundSize: 'cover',
    backgroundPosition: 'center',
  };


  return (
    <div style={containerStyle}>
      <LoginForm handleLogin={handleLogin} />
      
    </div>
  );
};

export default App;
