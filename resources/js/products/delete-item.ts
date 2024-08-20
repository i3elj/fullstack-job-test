import MsgNotification from "./MsgNotification";

const dialog = document.querySelector(
  "#confirmation-dialog",
) as HTMLDialogElement;
const confirmBtn = dialog.querySelector("button#confirm") as HTMLButtonElement;
const cancelBtn = dialog.querySelector("button#cancel") as HTMLButtonElement;
const productTag = dialog.querySelector("#product") as HTMLParagraphElement;

const notifications = document.querySelector(
  "#notifications",
) as HTMLDivElement;

document.querySelectorAll(".delete-button").forEach((btn: Element, i) => {
  const button = btn as HTMLElement;
  const route = button.dataset.route;
  const csrf = button.querySelector("input[name='_token']") as HTMLInputElement;
  const csrfToken = csrf.value;

  button.addEventListener("click", (event) => {
    productTag.innerText = `"${button.dataset.name}"`;

    // I'm using onclick instead of an event listener cause
    // I don't want to add a new listener every loop.
    confirmBtn.onclick = (event) => {
      (async () => {
        const res = await fetch(route as string, {
          headers: { "X-CSRF-Token": csrfToken },
          method: "DELETE",
        });
        const json = await res.json();
        const popup = new MsgNotification("Item removido", json.success);
        const element = popup.getElement();
        notifications.appendChild(element);
        dialog.close();

        setTimeout(() => {
          notifications.removeChild(element);
          window.location.href = "/products";
        }, 2000);
      })();
    };

    dialog.showModal();
  });
});

cancelBtn.addEventListener("click", () => dialog.close());
dialog.addEventListener("close", (event) => {
  productTag.innerText = "";
  confirmBtn.onclick = () => {};
});
