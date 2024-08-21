import MsgNotification from "./MsgNotification";

const form = document.querySelector("#product-form") as HTMLFormElement;
const notifications = form?.querySelector("#notifications") as HTMLDivElement;

const nameInput = document.querySelector(
  "input[name='name']",
) as HTMLInputElement;
const nameErrorMsg = document.querySelector("#name-error") as HTMLSpanElement;

const categoryInput = document.querySelector(
  "input[name='category']",
) as HTMLInputElement;
const categoryErrorMsg = document.querySelector(
  "#category-error",
) as HTMLSpanElement;

const priceInput = document.querySelector(
  "input[name='price']",
) as HTMLInputElement;
const priceErrorMsg = document.querySelectorAll(
  ".price-errors",
) as NodeListOf<Element>;

priceInput?.addEventListener("input", (e) => {
  priceInput.value = priceInput.value.replace(",", ".");
  checkPriceForErrors(priceInput, priceErrorMsg);
});

form?.addEventListener("submit", (event) => {
  event.preventDefault();

  if (isEmpty(nameInput, nameErrorMsg)) return;
  if (isEmpty(categoryInput, categoryErrorMsg)) return;
  if (!checkPriceForErrors(priceInput, priceErrorMsg)) return;

  // from this point on everything should be fine
  const formData = new FormData(form);

  fetch(form.action, { method: form.method, body: formData })
    .then((res) => res.json())
    .then((json) => {
      notify(json, notifications);
      setTimeout(() => (window.location.href = "/products"), 3000);
    });
});

export function isEmpty(
  input: HTMLInputElement,
  errorMsgElemnt: HTMLSpanElement,
): boolean {
  if (input?.value == "") {
    input?.classList.add("border-red-400");
    errorMsgElemnt?.classList.remove("hidden");
    return true;
  }

  input?.classList.remove("border-red-400");
  errorMsgElemnt?.classList.add("hidden");
  return false;
}

/**
 * If there's any errors, displays a message on the screen and
 * returns true.
 *
 * @return {boolean} True for errors, false otherwise.
 */
export function checkPriceForErrors(
  input: HTMLInputElement,
  priceErrorMsg: NodeListOf<Element>,
): boolean {
  if (input == null) return false;

  const maxValue = 999999.99;
  const currencyRegex = /^[0-9\.]*$/;
  const letterRegex = /[a-zA-Z!@#$%^&*()_+\-=\[\]{};':"\\|<>\/?]/;

  // false means error
  const errors = [
    currencyRegex.test(input.value),
    Number(input.value.replace(letterRegex, "")) <= maxValue,
  ];

  if (!errors[0]) {
    priceErrorMsg[0].classList.remove("hidden");
    input.classList.add("input-error");
  } else {
    priceErrorMsg[0]?.classList.add("hidden");
    input?.classList.remove("input-error");
  }

  if (!errors[1]) {
    priceErrorMsg[1]?.classList.remove("hidden");
    input?.classList.add("input-error");
  } else {
    priceErrorMsg[1]?.classList.add("hidden");
    input?.classList.remove("input-error");
  }

  return errors[0] || errors[1];
}

export function notify(json: any, notifications: HTMLDivElement) {
  json.msgs.forEach((msg: string, i: number) => {
    const popup = new MsgNotification(msg, json.success, 3);
    const element = popup.getElement();
    notifications.appendChild(element);
    popup.startTimer();
    const factor = i == 0 ? 1 : i / 1.5;
    setTimeout(() => notifications?.removeChild(element), 3000 * factor);
  });
}
