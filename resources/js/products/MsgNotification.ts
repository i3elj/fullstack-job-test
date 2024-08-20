export default class MsgNotification {
  msg: string = "";
  success: boolean = true;

  constructor(msg: string, success: boolean) {
    this.msg = msg;
    this.success = success;
  }

  getElement(): Node {
    const div = document.createElement("div");
    div.classList.add("msg-notification");
    div.classList.add(this.success ? "success" : "error");
    const msg = document.createElement("p");
    msg.innerText = this.msg;
    div.appendChild(msg);
    return div;
  }
}
