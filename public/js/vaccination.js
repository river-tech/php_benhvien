document.addEventListener('DOMContentLoaded', () => {
    const diseaseSelect = document.querySelector('#disease_id');
    const vaccineSelect = document.querySelector('#vaccine_id');
    if (!diseaseSelect || !vaccineSelect) {
        return;
    }

    const basePath = document.querySelector('head').dataset.base || '';

    const fetchVaccines = async (diseaseId) => {
        if (!diseaseId) {
            vaccineSelect.innerHTML = '<option value="">Select vaccine</option>';
            return;
        }
        const response = await fetch(`${basePath}/api/vaccines?disease_id=${diseaseId}`);
        const data = await response.json();
        vaccineSelect.innerHTML = data.map((item) => `<option value="${item.id}">${item.name}</option>`).join('');
    };

    diseaseSelect.addEventListener('change', (e) => {
        fetchVaccines(e.target.value);
    });
});
