function notify(type = "info", message = "Something happened") {
    const config = {
        success: {
            color: "#16a34a",
            icon: "✅", // Emoji success
        },
        error: {
            color: "#dc2626",
            icon: "❌", // Emoji error
        },
        warning: {
            color: "#f59e0b",
            icon: "⚠️", // Emoji warning
        },
        info: {
            color: "#3b82f6",
            icon: "ℹ️", // Emoji info
        },
    };

    const current = config[type] || config.info;

    iziToast.show({
        title: `${current.icon} ${
            type.charAt(0).toUpperCase() + type.slice(1)
        }`,
        message: message,
        position: "topRight",
        timeout: 1800,
        backgroundColor: current.color,
        messageColor: "#ffffff",
        titleColor: "#ffffff",
        progressBarColor: "#ffffff",
        close: true,
        pauseOnHover: true,
        transitionIn: "fadeInDown",
        transitionOut: "fadeOutUp",
    });
}
