class Notification {
    success(msg) {
        Toast.fire({
            icon: "success",
            title: "Created in successfully",
        });
    }

    error(msg) {
        Toast.fire({
            icon: "warning",
            title: msg,
        });
    }


    update(msg) {
        Toast.fire({
            icon: "success",
            title: "Successfully done!",
        });
    }
}

export default Notification = new Notification();
