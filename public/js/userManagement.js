window.UserManager = window.UserManager || {
    data: null,
    listeners: [],
    initialized: false,

    init() {
        if (this.initialized) return;
        this.initialized = true;
        this.fetchUserData();
    },

    async fetchUserData() {
        const userId = localStorage.getItem("id");
        if (!userId) {
            notify("error", "Undefined User");
            return;
        }

        try {
            const response = await $.ajax({
                url: `http://10.21.1.125:8000/api/user/${userId}`,
                type: "GET",
            });

            if (response.status === true) {
                this.data = response.user;
                this.notifyListeners();
            } else {
                notify("error", "Error while fetching user data");
            }
        } catch (error) {
            notify("error", "Failed to fetch user data");
        }
    },

    addListener(callback) {
        this.listeners.push(callback);
        if (this.data) {
            callback(this.data);
        }
    },

    notifyListeners() {
        this.listeners.forEach((callback) => callback(this.data));
    },

    updateUser(userData) {
        this.data = userData;
        this.notifyListeners();
    },
};
