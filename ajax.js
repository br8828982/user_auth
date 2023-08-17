async function handleAuth(formId) {
  const form = document.getElementById(formId);

  if (!form) {
    return;
  }

  form.addEventListener("submit", async (event) => {
    event.preventDefault();

    try {
      const formData = new FormData(event.target);
      const response = await fetch("auth.php", {
        method: "POST",
        body: formData,
      });

      const {success, message, redirect} = await response.json();
      alert(message);

      if (success) {
        window.location.href = redirect;
      }
    } catch (error) {
      console.error("Error:", error);
    }
  });
}

handleAuth("register-form");
handleAuth("login-form");
handleAuth("logout-form");
