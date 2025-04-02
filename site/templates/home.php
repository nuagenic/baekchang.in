<?php snippet('header') ?>

<section class="section">
    <div class="columns is-full">
        <div class="column is-8-12-900" id="home-column" data-title="<?= $page->title() ?>" data-description="<?= $page->description() ?>">
            <div id="home-container"></div>
            <div class="pagination-nav" style="display: flex; justify-content: center;">
                <button id="prevPage" class="pagination-button">&lt;</button>
                <span id="currentPage">1</span>
                <button id="nextPage" class="pagination-button">&gt;</button>
            </div>
        </div>
        <div class="column is-4-12-900 is-flex-end" id="info-column">
            <div id="project-img"></div>
            <h1 class="title project-title"></h1>
            <p id="project-description" class="description project-description"></p>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Pagination
        let currentPage = 1;
        let totalPages = 1;

        function loadProjects(page) {
            fetch(`/fetch-projects/${page}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById("home-container").innerHTML = data.html;
                    document.getElementById("currentPage").innerText = page;
                    currentPage = page;
                    totalPages = data.totalPages;

                    document.getElementById("prevPage").disabled = (currentPage === 1);
                    document.getElementById("nextPage").disabled = (currentPage >= totalPages);

                })
                .catch(error => console.error("프로젝트를 불러올 수 없습니다:", error));
        }

        document.getElementById("prevPage").addEventListener("click", function() {
            if (currentPage > 1) {
                loadProjects(currentPage - 1);
            }
        });

        document.getElementById("nextPage").addEventListener("click", function() {
            if (currentPage < totalPages) {
                loadProjects(currentPage + 1);
            }
        });

        loadProjects(1);

        // Fill in project info
        const projectTitle = document.querySelector(".project-title");
        // const projectDate = document.querySelector("#project-date");
        const projectDescription = document.querySelector(".project-description");
        const projectImg = document.getElementById("project-img");

        const homeColumn = document.getElementById("home-column");
        const homeContainer = document.getElementById("home-container");

        projectTitle.innerText = homeColumn.dataset.title;
        // projectDate.innerText = homeColumn.dataset.date ?? null;
        projectDescription.innerText = homeColumn.dataset.description;

        // 버튼 클릭 시 프로젝트 정보 homeColumn에 업데이트
        homeContainer.addEventListener("click", function(event) {
            const button = event.target.closest(".project-button");
            if (!button) return; // Ignore clicks outside buttons

            const title = button.dataset.title;
            const url = button.dataset.url;
            const sliceFrom = button.dataset.slicefrom;
            const sliceTo = button.dataset.sliceto;

            projectTitle.innerHTML = `<span>${title.slice(0, sliceFrom)}</span><a href=${url} class="link-text">${title.slice(sliceFrom, sliceTo)}</a><span>${title.slice(sliceTo)}</span>`;
            // projectDate.innerText = button.dataset.date ?? null;
            projectDescription.innerText = button.dataset.description;
            projectImg.innerHTML = `<a href="${button.dataset.url}"><img src="${button.dataset.img}" alt="${button.dataset.title}" class="image"></a>`;

            event.stopPropagation();
        });

        // 버튼 더블 클릭 시 프로젝트 페이지로 이동
        homeContainer.addEventListener("dblclick", function(event) {
            const button = event.target.closest(".project-button");
            if (button) {
                window.location.href = button.dataset.url;
            }
        });

        homeColumn.addEventListener("click", function() {
            projectTitle.innerText = this.dataset.title;
            // projectDate.innerText = this.dataset.date ?? null;
            projectDescription.innerText = this.dataset.description;
            projectImg.innerHTML = "";
        });
    });
</script>

<?php snippet('footer') ?>