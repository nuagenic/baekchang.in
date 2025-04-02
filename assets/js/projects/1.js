const today = document.getElementById("today");
const yesterday = document.getElementById("yesterday");

const todayDate = new Date();
const yesterdayDate = new Date();
yesterdayDate.setDate(yesterdayDate.getDate() - 1);

let [todayDay, todayMonth, todayYear] = [
  todayDate.getDate(),
  todayDate.getMonth() + 1,
  todayDate.getFullYear(),
];

todayDay = todayDay < 10 ? `0${todayDay}` : todayDay;
todayMonth = todayMonth < 10 ? `0${todayMonth}` : todayMonth;
todayYear = todayYear.toString().slice(2);

let [yesterdayDay, yesterdayMonth, yesterdayYear] = [
  yesterdayDate.getDate(),
  yesterdayDate.getMonth() + 1,
  yesterdayDate.getFullYear(),
];

yesterdayDay = yesterdayDay < 10 ? `0${yesterdayDay}` : yesterdayDay;
yesterdayMonth = yesterdayMonth < 10 ? `0${yesterdayMonth}` : yesterdayMonth;
yesterdayYear = yesterdayYear.toString().slice(2);

today.textContent = `${todayYear}/${todayMonth}/${todayDay}`;
yesterday.textContent = `${yesterdayYear}/${yesterdayMonth}/${yesterdayDay}`;
