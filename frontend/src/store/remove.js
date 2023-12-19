const clear = () => {
    localStorage.removeItem('Id');
    localStorage.removeItem('isUser');
    localStorage.removeItem('role');
    location.reload();
  };
  
export { clear };
  