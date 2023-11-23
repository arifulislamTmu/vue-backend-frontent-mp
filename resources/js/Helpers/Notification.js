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

    loggedIn(msg) {
        Toast.fire({
            icon: "success",
            title: "Successfully Logged In",
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
