const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

body.dark-mode {
    background-color: #333;
    color: #fff;
  }

  body.light-mode {
    background-color: #fff;
    color: #333;
  }

  .mode-toggle {
    position: fixed;
    top: 10px;
    right: 10px;
  }
