{

  /* ========================
    Variables
  ======================== */

  const FIREBASE_AUTH = firebase.auth();
  const FIREBASE_MESSAGING = firebase.messaging();
  const FIREBASE_DATABASE = firebase.database();

  const signInButton = document.getElementById('sign-in');
  const signOutButton = document.getElementById('sign-out');

  /* ========================
    Event Listeners
  ======================== */

  signInButton.addEventListener('click', signIn);
  signOutButton.addEventListener('click', signOut);

  FIREBASE_AUTH.onAuthStateChanged(handleAuthStateChanged);

  /* ========================
    Functions
  ======================== */

  function signIn() {
    FIREBASE_AUTH.signInWithPopup(new firebase.auth.GoogleAuthProvider());
  }

  function signOut() {
    FIREBASE_AUTH.signOut();
  }

  function handleAuthStateChanged(user) {
    if (user) {
      console.log(user);
      signInButton.setAttribute('hidden', 'true');
      signOutButton.removeAttribute('hidden');
    } else {
      console.log('No User!');
      signOutButton.setAttribute('hidden', 'true');
      signInButton.removeAttribute('hidden');
    }
  }

}