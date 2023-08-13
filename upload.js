// upload.js
document.getElementById("upload-form").addEventListener("submit", async (event) => {
    event.preventDefault();
    const videoFile = document.getElementById("video").files[0];
    
    if (videoFile) {
        const formData = new FormData();
        formData.append("video", videoFile);

        try {
            const response = await fetch("upload.php", {
                method: "POST",
                body: formData,
            });

            if (response.ok) {
                const responseData = await response.text();
                if (responseData === "success") {
                    window.location.href = "video.html"; // Redirect to video page after upload
                } else {
                    console.error("Error uploading video");
                }
            } else {
                console.error("Error uploading video");
            }
        } catch (error) {
            console.error("Error uploading video:", error);
        }
    }
});
