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

      const result = await response.json();
      alert(result.message);

      if (result.status) {
        window.location.href = result.redirect;
      }
    } catch (error) {
      console.error("Error:", error);
    }
  });
}

handleAuth("register-form");
handleAuth("login-form");
handleAuth("logout-form");
