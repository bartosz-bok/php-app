import { useState } from 'react';
import { LoginForm } from '../../components/LoginForm/LoginForm';
import { PasswordResetForm } from '../../components/ChangePasswordForm/ChangePasswordForm';
import styles from './styles.module.css';
import { EventEditor } from '../EventEditor/EventEditor';

export const AdminPanel = () => {
  const [isChangingPassword, setIsChangingPassword] = useState(false);
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  const [jwtToken, setJwtToken] = useState(localStorage.getItem('jwtToken'));
  const [error, setError] = useState('');

  const handleLogin = async (e) => {
    e.preventDefault();
    setError('');

    try {
      const response = await fetch('/api', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `username=${username}&password=${password}&event_type=login`,
      });

      if (response.ok) {
        const data = await response.json();
        const { jwt } = data;
        localStorage.setItem('jwtToken', jwt);
        setJwtToken(jwt);
      } else {
        setError('Invalid username or password');
      }
    } catch (error) {
      console.error('Error during login:', error);
      setError('Something went wrong. Please try again later.');
    }
  };

  const handleLogout = () => {
    localStorage.removeItem('jwtToken');
    setJwtToken(null);
  };

  const handleChangePassword = () => {
    setIsChangingPassword((prevState) => !prevState);
  };

  if (!jwtToken) {
    return (
      <LoginForm
        username={username}
        setUsername={setUsername}
        password={password}
        setPassword={setPassword}
        error={error}
        handleLogin={handleLogin}
      />
    );
  } else {
    return (
      <div className={styles.container}>
      <div className={styles.innerContainer}>
        <div className={styles.buttonContainer}>
          <button className={styles.button} onClick={handleChangePassword}>
            Change Password
          </button>
          <button className={`${styles.button} ${styles.logoutButton}`} onClick={handleLogout}>
            Logout
          </button>
        </div>
        {isChangingPassword && <PasswordResetForm />}
        <EventEditor />
      </div>
    </div>
    );
  }
};
