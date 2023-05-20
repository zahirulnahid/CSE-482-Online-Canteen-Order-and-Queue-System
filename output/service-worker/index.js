const check = () => {
    if (!('serviceWorker' in navigator)) {
      throw new Error('No Service Worker support!')
    }
    if (!('PushManager' in window)) {
      throw new Error('No Push API Support!')
    }
  }
  
  const registerServiceWorker = async () => {
    const swRegistration = await navigator.serviceWorker.register('service-worker/service.js')
    return swRegistration
  }
  
  const requestNotificationPermission = async () => {
    const permission = await window.Notification.requestPermission()
    // value of permission can be 'granted', 'default', 'denied'
    // granted: user has accepted the request
    // default: user has dismissed the notification permission popup by clicking on x
    // denied: user has denied the request.
    if (permission !== 'granted') {
      throw new Error('Permission not granted for Notification')
    }
  }
  const showLocalNotification = (title, body, swRegistration) => {
    const options = {
        body,
        "icon": "https://blog.atulr.com/static/coffee-e208eb2ebad601320fbcf3302080dc8f.svg",
        sound: "notification-sound-7062.mp3"
        // here you can add more properties like icon, image, vibrate, etc.
    };
    swRegistration.showNotification(title, options);

}
const options = {
    "//": "Visual Options",
    "body": "<String>",
    "icon": "<URL String>",
    "image": "<URL String>",
    "badge": "<URL String>",
    "vibrate": "<Array of Integers>",
    "sound": "<URL String>",
    "dir": "<String of 'auto' | 'ltr' | 'rtl'>",
    "//": "Behavioural Options",
    "tag": "<String>",
    "data": "<Anything>",
    "requireInteraction": "<boolean>",
    "renotify": "<Boolean>",
    "silent": "<Boolean>",
    "//": "Both Visual & Behavioural Options",
    "actions": "<Array of Strings>",
    "//": "Information Option. No visual affect.",
    "timestamp": "<Long>"
  }
  const main = async (title, body) => {
    check();
    const swRegistration = await registerServiceWorker();
    const permission = await requestNotificationPermission();
    showLocalNotification(title, body, swRegistration);
  }
  // main();// we will not call main in the beginning.