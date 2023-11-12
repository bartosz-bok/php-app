import { eventsMapper } from '../utils/eventsMapper';

export const getEvents = async () => {
  let formData = new FormData();
  formData.append('event_name', 'display_events');
  return fetch('/api', {
    method: 'POST',
    headers: {
      'Access-Control-Allow-Origin': '*',
    },
    body: formData,
  })
    .then((res) => res.json())
    .then((data) => eventsMapper(data));
};
