export const imgUrlConverter = {
    methods: {
        setImgUrl(img) {
            const ImgParts = img.split("/");
            return (
                "http://127.0.0.1:8000/storage/images/" +
                ImgParts[ImgParts.length - 1]
            );
        },
    },
};
