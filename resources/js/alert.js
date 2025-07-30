import flashy from '@pablotheblink/flashyjs';

flashy.setDefaults({
    position: 'top-center',  
    theme: 'dark',           
    timeout: 6000,           
    animation: 'fade',      
});

document.addEventListener('DOMContentLoaded', () => {
    const status = document.querySelector('meta[name="flash-status"]')?.content;
    const error = document.querySelector('meta[name="flash-error"]')?.content;

    if (status) flashy(status, { type: 'success' });
    if (error) flashy(error, { type: 'error' });
});