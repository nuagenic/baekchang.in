const instagramFeed = document.getElementById("instagram-feed");
const instagrammable = document.getElementById("instagrammable");

const resizeObserver = new ResizeObserver((entries) => {
  for (let entry of entries) {
    const { width, height } = entry.contentRect;
    const aspectRatio = Math.floor((width / height) * 1000) / 1000;

    if (aspectRatio < 0.65) {
      instagrammable.textContent = "NOT INSTAGRAMMABLE";
      instagramFeed.style.backgroundColor = "red";
      instagrammable.style.color = "red";
    } else if (aspectRatio < 0.78) {
      instagrammable.textContent = "ALMOST INSTAGRAMMABLE";
      instagramFeed.style.backgroundColor = "skyblue";
      instagrammable.style.color = "skyblue";
    } else if (aspectRatio < 0.82) {
      instagrammable.textContent = "INSTAGRAMMABLE";
      instagramFeed.style.backgroundColor = "blue";
      instagrammable.style.color = "blue";
    } else if (aspectRatio < 0.95) {
      instagrammable.textContent = "ALMOST INSTAGRAMMABLE";
      instagramFeed.style.backgroundColor = "skyblue";
      instagrammable.style.color = "skyblue";
    } else if (aspectRatio < 1.05) {
      instagrammable.textContent = "WAS INSTAGRAMMABLE";
      instagramFeed.style.backgroundColor = "gray";
      instagrammable.style.color = "gray";
    } else {
      instagrammable.textContent = "NOT INSTAGRAMMABLE";
      instagramFeed.style.backgroundColor = "red";
      instagrammable.style.color = "red";
    }
  }
});

resizeObserver.observe(instagramFeed);
