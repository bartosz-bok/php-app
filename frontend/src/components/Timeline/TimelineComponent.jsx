import { Timeline } from '@knight-lab/timelinejs';
import '@knight-lab/timelinejs/dist/css/timeline.css';
import { useEffect, useRef } from 'react';
import events from '../../../data/test.json';
import styles from './styles.module.css';
import PropTypes from 'prop-types';

export const TimelineComponent = ({ data }) => {
  const timelineEl = useRef(null);

  useEffect(() => {
    new Timeline(
      timelineEl.current,
      {
        title: events.title,
        events: data,
      },
    );
  }, [data]);
  return (
    <>
      <div className={styles.timeline}>
        <div ref={timelineEl}></div>
      </div>
      <p>Dane z backendu:</p>
      <pre>{JSON.stringify(data, null, 2)}</pre>
    </>
  );
};

TimelineComponent.propTypes = {
  data: PropTypes.array.isRequired,
};
