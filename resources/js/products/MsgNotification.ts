export default class MsgNotification {
  msg: string = "";
  success: boolean = true;
  timer: number = 0;
  private span: HTMLSpanElement;
  private div: HTMLDivElement;
  private p: HTMLParagraphElement;

  constructor(msg: string, success: boolean, timer: number) {
    this.msg = msg;
    this.success = success;
    this.timer = timer;
    this.span = document.createElement("span");
    this.div = document.createElement("div");
    this.p = document.createElement("p");
  }

  getElement(): Node {
    this.div.classList.add("msg-notification");
    this.div.classList.add(this.success ? "success" : "error");
    this.p.innerText = this.msg;
    this.span.innerText = String(this.timer);
    this.div.appendChild(this.p);
    return this.div;
  }

  startTimer(): void {
    this.div.appendChild(this.span);
    const id = setInterval(() => {
      console.log("hi");
      this.timer -= 1;
      this.span.innerText = String(this.timer);
    }, 1000);
    setTimeout(
      () => {
        clearInterval(id);
        this.div.parentNode?.removeChild(this.div);
      },
      (this.timer + 1) * 1000,
    );
  }
}
