import http from "k6/http";
import { sleep, check } from "k6";

export const options = {
  vus: 100,
  duration: "30s",
};

export default function () {
  let res = http.get("http://127.0.0.1:5500/index_ex3.html");
  check(res, { "status is 200": (res) => res.status === 200 });
  sleep(1);
}
