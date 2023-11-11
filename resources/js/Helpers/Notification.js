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

    remove(msg) {
        Toast.fire({
            icon: "success",
            title: "Successfully removed !",
        });
    }
}

export default Notification = new Notification();
