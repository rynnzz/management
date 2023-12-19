export function redirectToUrl() {
    window.addEventListener('beforeunload', function () {
      localStorage.setItem('redirectToUrl', 'http://localhost:5173/');
    });
  
    const redirectToUrl = localStorage.getItem('redirectToUrl');
    if (redirectToUrl) {
      window.location.href = redirectToUrl;
      localStorage.removeItem('redirectToUrl');
    }
  }
  