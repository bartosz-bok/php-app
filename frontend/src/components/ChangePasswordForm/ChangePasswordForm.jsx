import { useState } from 'react';
import styles from './styles.module.css';

export const PasswordResetForm = () => {
  const [newPassword, setNewPassword] = useState('');
  const [confirmNewPassword, setConfirmNewPassword] = useState('');
  const [error, setError] = useState('');

  const handleResetPassword = async (e) => {
    e.preventDefault();
    setError('');

    if (newPassword !== confirmNewPassword) {
      setError('Passwords do not match.');
      return;
    }

    try {
      await resetPassword(newPassword);

      setNewPassword('');
      setConfirmNewPassword('');
    } catch (error) {
      setError('Error resetting password. Please try again.');
    }
  };

  return (
    <form className={styles.formContainer} onSubmit={handleResetPassword}>
      <label className={styles.label}>
        New Password:
        <input
          className={styles.input}
          type="password"
          value={newPassword}
          onChange={(e) => setNewPassword(e.target.value)}
        />
      </label>
      <label className={styles.label}>
        Confirm New Password:
        <input
          className={styles.input}
          type="password"
          value={confirmNewPassword}
          onChange={(e) => setConfirmNewPassword(e.target.value)}
        />
      </label>
      {error && <p className={styles.error}>{error}</p>}
      <button className={styles.button} type="submit">
        Reset Password
      </button>
    </form>
  );
};

// tmp
const resetPassword = (newPassword) => {
  console.log(`Simulating password reset with new password: ${newPassword}`);
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      const isError = Math.random() < 0.2;

      if (isError) {
        reject(new Error('Simulated error during password reset'));
      } else {
        resolve();
      }
    }, 1000);
  });
};
