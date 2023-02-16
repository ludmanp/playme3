export const initToggleVideo = () => {
    const findVideos = () => {
        let videos = document.querySelectorAll('.informationBlock__videoBlock');

        for (let i = 0; i < videos.length; i++) {
            setupVideo(videos[i]);
        }
    }

    const setupVideo = (video) => {
        let link = video.querySelector('.clientGallery__videoLink');
        let button = video.querySelector('.clientGallery__videoLink');
        let id = parseMediaURL(link);

        video.addEventListener('click', () => {
            debugger
            let iframe = createIframe(id);

            link.remove();
            button.remove();
            video.appendChild(iframe);
        });

        link.removeAttribute('href');
        video.classList.add('clientGallery__videoBlock_enabled');
    }

    const parseMediaURL = (media) => {
        let regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
        let match = media.href.match(regExp);

        return (match && match[7].length === 11) ? match[7] : false;
    }

    const createIframe = (id) => {
        let iframe = document.createElement('iframe');

        iframe.setAttribute('allowfullscreen', '');
        iframe.setAttribute('allow', 'autoplay');
        iframe.setAttribute('src', generateURL(id));
        iframe.classList.add('clientGallery__videoImage');

        return iframe;
    }

    const generateURL = (id) => {
        let query = '?rel=0&showinfo=0&autoplay=1';

        console.log('id', id)

        return 'https://www.youtube.com/embed/' + id + query;
    }

    findVideos();
}
