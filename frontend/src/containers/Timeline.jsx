import { Error } from '../components/Error';
import { TimelineComponent } from '../components/Timeline';
import { useFetchEvents } from '../hooks/useFetchEvents';

export const Timeline = () => {
  const { events, hasError } = useFetchEvents();
  return hasError ? (
    <Error errorText="Service unavailable, please try again later" />
  ) : (
    <TimelineComponent data={events} />
  );
};
