function data() {
    function getThemeFromLocalStorage() {
        // if user already changed the theme, use it
        if (window.localStorage.getItem("dark")) {
            return JSON.parse(window.localStorage.getItem("dark"));
        }

        // else return their preferences
        return (
            !!window.matchMedia &&
            window.matchMedia("(prefers-color-scheme: dark)").matches
        );
    }

    function setThemeToLocalStorage(value) {
        window.localStorage.setItem("dark", value);
    }

    return {
        dark: getThemeFromLocalStorage(),
        toggleTheme() {
            this.dark = !this.dark;
            setThemeToLocalStorage(this.dark);
        },
        isSideMenuOpen: false,
        toggleSideMenu() {
            this.isSideMenuOpen = !this.isSideMenuOpen;
        },
        closeSideMenu() {
            this.isSideMenuOpen = false;
        },
        isNotificationsMenuOpen: false,
        toggleNotificationsMenu() {
            this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen;
        },
        closeNotificationsMenu() {
            this.isNotificationsMenuOpen = false;
        },
        isProfileMenuOpen: false,
        toggleProfileMenu() {
            this.isProfileMenuOpen = !this.isProfileMenuOpen;
        },
        closeProfileMenu() {
            this.isProfileMenuOpen = false;
        },
        isPagesMenuOpen: false,
        togglePagesMenu() {
            this.isPagesMenuOpen = !this.isPagesMenuOpen;
        },
        // Modal
        isModalOpen: false,
        trapCleanup: null,
        openModal() {
            this.isModalOpen = true;
            this.trapCleanup = focusTrap(document.querySelector("#modal"));
        },
        closeModal() {
            this.isModalOpen = false;
            this.trapCleanup();
        },

        isModalStatusOpen: false,
        trapCleanupStatus: null,
        openModalStatus() {
            this.isModalStatusOpen = true;
            this.trapCleanup = focusTrap(
                document.querySelector("#modalStatus")
            );
        },
        closeModalStatus() {
            this.isModalStatusOpen = false;
            this.trapCleanup();
        },

        // Modal Generate Complaint by Date
        isModalPrintByDateOpen: false,
        trapCleanupStatus: null,
        openModalPrintByDate() {
            this.isModalPrintByDateOpen = true;
            this.trapCleanup = focusTrap(
                document.querySelector("#modalPrintByDate")
            );
        },
        closeModalPrintByDate() {
            this.isModalPrintByDateOpen = false;
            this.trapCleanup();
        },

        // Modal Search by Date
        isModalSearchByDateOpen: false,
        trapCleanupStatus: null,
        openModalSearchByDate() {
            this.isModalSearchByDateOpen = true;
            this.trapCleanup = focusTrap(
                document.querySelector("#modalSearchByDate")
            );
        },
        closeModalSearchByDate() {
            this.isModalSearchByDateOpen = false;
            this.trapCleanup();
        },

        // Modal Search by Month
        isModalSearchByMonthOpen: false,
        trapCleanupStatus: null,
        openModalSearchByMonth() {
            this.isModalSearchByMonthOpen = true;
            this.trapCleanup = focusTrap(
                document.querySelector("#modalSearchByMonth")
            );
        },
        closeModalSearchByMonth() {
            this.isModalSearchByMonthOpen = false;
            this.trapCleanup();
        },

        // Modal Search by Year
        isModalSearchByYearOpen: false,
        trapCleanupStatus: null,
        openModalSearchByYear() {
            this.isModalSearchByYearOpen = true;
            this.trapCleanup = focusTrap(
                document.querySelector("#modalSearchByYear")
            );
        },
        closeModalSearchByYear() {
            this.isModalSearchByYearOpen = false;
            this.trapCleanup();
        },

        // Modal Print by Month
        isModalPrintByMonthOpen: false,
        trapCleanupStatus: null,
        openModalPrintByMonth() {
            this.isModalPrintByMonthOpen = true;
            this.trapCleanup = focusTrap(
                document.querySelector("#modalPrintByMonth")
            );
        },
        closeModalPrintByMonth() {
            this.isModalPrintByMonthOpen = false;
            this.trapCleanup();
        },

        // Modal Print by Year
        isModalPrintByYearOpen: false,
        trapCleanupStatus: null,
        openModalPrintByYear() {
            this.isModalPrintByYearOpen = true;
            this.trapCleanup = focusTrap(
                document.querySelector("#modalPrintByYear")
            );
        },
        closeModalPrintByYear() {
            this.isModalPrintByYearOpen = false;
            this.trapCleanup();
        },

        // Modal Print by Year
        isModalAddCategoryOpen: false,
        trapCleanupStatus: null,
        openModalAddCategory() {
            this.isModalAddCategoryOpen = true;
            this.trapCleanup = focusTrap(
                document.querySelector("#modalAddCategory")
            );
        },
        closeModalAddCategory() {
            this.isModalAddCategoryOpen = false;
            this.trapCleanup();
        },
    };
}
